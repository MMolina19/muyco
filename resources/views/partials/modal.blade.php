<!-- Modal -->
<div class="modal fade" id="{{$thumb['modal-id']}}" tabindex="-1"
    aria-labelledby="{{$thumb['modal-label']}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{$thumb['modal-label']}}">{{$thumb['p']}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img class="bd-placeholder-img card-img-top" width="100%" height="100%"
            src="{{asset($thumb['img-expanded-src'])}}" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
      </div>
    </div>
</div>
