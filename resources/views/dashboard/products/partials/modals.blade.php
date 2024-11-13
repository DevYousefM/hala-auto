{{-- Material Modal --}}
<div class="add-material modal fade" id="add-material" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header">
                <h6 class="modal-title">Add Material</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('dashboard/img/svg/x.svg') }}" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addMaterialForm">
                    <div class="form-basic">
                        <div class="form-group mb-25">
                            <label>Name</label>
                            <input class="form-control" type="text" name="material_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addMaterialBtn" class="btn btn-primary btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- Style Modal --}}
<div class="add-style modal fade" id="add-style" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header">
                <h6 class="modal-title">Add Style</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('dashboard/img/svg/x.svg') }}" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addStyleForm">
                    <div class="form-basic">
                        <div class="form-group mb-25">
                            <label>Name</label>
                            <input class="form-control" type="text" name="style_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addStyleBtn" class="btn btn-primary btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- Color Modal --}}
<div class="add-color modal fade" id="add-color" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header">
                <h6 class="modal-title">Add Color</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('dashboard/img/svg/x.svg') }}" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addColorForm">
                    <div class="form-basic">
                        <div class="form-group mb-25">
                            <label>Name</label>
                            <input class="form-control" type="text" name="color_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addColorBtn" class="btn btn-primary btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- Size Modal --}}
<div class="add-size modal fade" id="add-size" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white ">
            <div class="modal-header">
                <h6 class="modal-title">Add Size</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <img src="{{ asset('dashboard/img/svg/x.svg') }}" alt="x" class="svg">
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addSizeForm">
                    <div class="form-basic">
                        <div class="form-group mb-25">
                            <label>Name</label>
                            <input class="form-control" type="text" name="size_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addSizeBtn" class="btn btn-primary btn-sm">Save</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
