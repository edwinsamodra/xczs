<form action="/logout" method="post" id="logout-form" enctype="multipart/form-data" aria-hidden="true" aria-labelledby="modalInputLabel">
    @csrf
    <!-- Modal -->
    <div class="modal" role="dialog" id="ModalLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Keluar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah Anda Ingin <b>keluar?</b>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-danger">Keluar</button>
        </div>
        </div>
    </div>
    </div>
</form>