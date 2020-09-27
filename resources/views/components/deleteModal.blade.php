<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body text-center">
            <h5 class="modal-title " id="deleteModalLabel">Biztosan törölni szeretnéd ezt {{ $modelName }}?</h5>
            <i>(Ez nem viszavonható, végleg elveszik!)</i>
        </div>
        <div class="modal-footer">
            <div class="col-6">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Mégsem</button>
            </div>
            <div class="col-6">
                <form action="{{ $actionPath }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<!-- /Modal -->
