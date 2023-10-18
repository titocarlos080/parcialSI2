<div>
    <div id="modal" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">DETALLES DEL PEDIDO</h4>
                    <button wire:click="cancelar()" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                 
                            {{$detallepedido}}
                               
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>