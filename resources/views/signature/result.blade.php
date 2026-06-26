<form>

    <div class="mb-3">
        <label>Nome</label>
        <input
            type="text"
            class="form-control"
            value="{{ $data['name'] }}">
    </div>

    <div class="mb-3">
        <label>Cargo</label>
        <input
            type="text"
            class="form-control"
            value="{{ $data['position'] }}">
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input
            type="text"
            class="form-control"
            value="{{ $data['phone'] }}">
    </div>

    <div class="mb-3">
        <label>E-mail</label>
        <input
            type="email"
            class="form-control"
            value="{{ $data['email'] }}">
    </div>

</form>