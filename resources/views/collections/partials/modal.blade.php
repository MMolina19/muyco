<!-- Modal -->
<div class="modal fade" id="editImagesModal-{{$data['product_id']}}-{{$data['collection_id']}}" tabindex="-1"
    aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-label"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background-color:#f5f5f5;">
            <form id="add-images-$data['collection_slug']"
                action="{{route('images.store', $data['collection_slug'])}}"
                method="POST" <!--style="display: none;"-->
                enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 imgUp">
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">
                                Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                            </label>
                        </div><!-- col-2 -->
                        <i class="fa fa-plus imgAdd"></i>
                    </div><!-- row -->
                </div><!-- container -->
                <div class="form-input">
                    <label for="image_path" class="form-label italic text-dark">
                        {{__('collections.image-input')}}
                    </label>
                    <input type="file" id="image_path" name="image_path[]" class="form-control"
                        placeholder="{{__('collections.image-input')}}"
                    value="@isset($collection) {{ $collection->image_path }} @else {{ old('image_path') }} @endisset"
                        multiple="multiple">
                    @if($data['images'])
                        @foreach ($data['images'] as $img)
                            {{$img}}
                            <img src="{{asset(json.decode($img))}}" class="img-medium">
                        @endforeach
                    @endif
                    @if ($errors->has('image_path'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('image_path') }}</strong>
                    </span>
                    @endif
                </div>

            </form>
            <button class="btn btn-sm btn-success quicksand"
                onclick="event.preventDefault();document.getElementById('activate-collection-{{$collection->slug}}').submit();" >
                {{__('collections.activate')}}</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
        </div>
      </div>
    </div>
</div>
