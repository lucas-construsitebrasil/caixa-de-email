<?= \App\Factory::getInstance('Header')->getScripts('footer') ?>
<!-- Modal -->
<div class="modal fade" id="modalNewMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Nova Mensagem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">De:</span>
                        <input type="text" class="form-control" value="seuemail@email.com" disabled>
                    </div>
                    <div class="mt-3 input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Para:</span>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="subject">
                        <label for="subject">Assunto</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <textarea class="form-control" id="messageText"></textarea>
                        <label for="messageText">Mensagem</label>
                    </div>
                </form>
            </div>
            <div class=" modal-footer ">
                <button type="button " class="btn btn-secondary " data-bs-dismiss="modal ">Cancelar</button>
                <button type="button " class="btn btn-success ">Enviar mensagem</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>