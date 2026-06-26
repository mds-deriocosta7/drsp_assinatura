import os
import cv2
import json
import sys

# 1. Recebe o caminho da imagem original enviado pelo PHP
if len(sys.argv) < 2:
    print(json.dumps({"status": "error", "message": "Caminho da imagem nao fornecido"}))
    sys.exit(1)

image_path = sys.argv[1]

# 2. Carrega a imagem da assinatura
img = cv2.imread(image_path)
if img is None:
    print(json.dumps({"status": "error", "message": "Nao foi possivel carregar a imagem"}))
    sys.exit(1)

# --- LÓGICA PARA DETECTAR E RECORTAR O LOGO ---
# Convertemos para escala de cinza e aplicamos limiarização (threshold)
gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
_, thresh = cv2.threshold(gray, 240, 255, cv2.THRESH_BINARY_INV)

# Encontra os contornos dos elementos na imagem
contours, _ = cv2.findContours(thresh, cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

# Filtra para encontrar o elemento mais à esquerda (geralmente o logo)
logo_box = None
min_x = img.shape[1] # Começa com a largura máxima da imagem

for cnt in contours:
    x, y, w, h = cv2.boundingRect(cnt)
    # Evita ruídos muito pequenos ou a assinatura inteira
    if w > 20 and h > 20 and w < img.shape[1] * 0.8:
        if x < min_x:
            min_x = x
            logo_box = (x, y, w, h)

# Se encontrou um elemento válido, recorta. Se não, usa um fallback (padrão)
if logo_box:
    x, y, w, h = logo_box
    # Adiciona uma pequena margem de segurança de 5 pixels
    h_img, w_img, _ = img.shape
    y1, y2 = max(0, y-5), min(h_img, y+h+5)
    x1, x2 = max(0, x-5), min(w_img, x+w+5)
    
    # CRUCIAL: Aqui a variável 'imagem_recortada' é definida!
    imagem_recortada = img[y1:y2, x1:x2]
else:
    # Fallback: Se falhar em achar o contorno, recorta o quadrante esquerdo padrão
    h_img, w_img, _ = img.shape
    imagem_recortada = img[0:h_img, 0:int(w_img*0.35)]

# --- SALVAMENTO E RETORNO ---
folder_destino = "/var/www/storage/app/private/signatures"

if not os.path.exists(folder_destino):
    os.makedirs(folder_destino)

nome_logo = "cropped_logo.png"
caminho_absoluto_salvamento = os.path.join(folder_destino, nome_logo)

# Agora a variável existe e o OpenCV vai salvar sem erros
cv2.imwrite(caminho_absoluto_salvamento, imagem_recortada)

# Devolve o JSON limpo para o PHP
retorno_php = {
    "status": "success",
    "logo": "signatures/" + nome_logo
}

print(json.dumps(retorno_php))
sys.exit(0)