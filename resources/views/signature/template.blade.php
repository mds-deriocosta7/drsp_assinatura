<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            margin: 0;
            padding: 10px;
            font-family: Arial, sans-serif;
            background: white;
        }

        table {
            cellpadding: 0;
            cellspacing: 0;
        }

        .name {
            font-size: 16px;
            color: #333;
            font-weight: bold;
        }

        .role {
            font-size: 14px;
            color: #666;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>
                <img src="data:image/png;base64,{{ $logoBase64 }}" width="120">
            </td>
            <td style="padding-left:15px;">
                <span class="name">{{ $name }}</span><br>
                <span class="role">{{ $role }}</span><br>
                📞 <a href="tel:{{ $phone }}">{{ $phone }}</a><br>
                ✉ <a href="mailto:{{ $email }}">{{ $email }}</a>
            </td>
        </tr>
    </table>

</body>

</html>
