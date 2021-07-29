@extends('layout')
@section('title', 'Admin Dashboard')
<?php if (isset($data)) { ?>
    @section('title_section', 'Edit Menu')
<?php } else { ?>
    @section('title_section', 'New Menu')
<?php } ?>
@section('css')
<link rel="stylesheet" href="/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
@stop
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Form</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" action="<?= isset($data) ? '/save-edit-stuff/' . $data->id : '/save-new-stuff'; ?>" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Name</label>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" id="name" value="<?= isset($data) ? $data->name : ""; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">File Upload</label>
                        <div class="col-md-6">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fa fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Change</span>
                                        <span class="fileupload-new">Select file</span>
                                        <input type="file" name="picture" onchange="hidePreview()"/>
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                            <br>
                            @if(isset($data))
                                <img class="preview" src="{{$data->picture == '' ? '/assets/images/projects/project-5.jpg' : asset('storage/pictures/' . $data->picture )}}" width="200" class="img-responsive" alt="Project">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Price</label>
                        <div class="col-md-4 input-group mb-md" style="padding-left: 15px;">
                            <span class="input-group-addon">Rp.</span>
                            <input type="text" name="price" class="form-control price" id="price" value="<?= isset($data) ? $data->price : ""; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Stock</label>
                        <div class="col-md-6">
                            <input type="number" name="stock" class="form-control stock" id="stock" value="<?= isset($data) ? $data->stock : ""; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Type</label>
                        <div class="col-md-6">
                            <select id="type" name="type" class="form-control mb-md type">
                                <option value="1">&nbsp;</option>
                                <option value="1" <?= isset($data) && $data->type == 1 ? "selected" : ""; ?>>Food</option>
                                <option value="2" <?= isset($data) && $data->type == 2 ? "selected" : ""; ?>>Drink</option>
                            </select>
                            <span class="help-block">Leave this empty, stuff will be automatically registered as <b>Food</b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Status</label>
                        <div class="col-md-6">
                            <select id="status" name="status" class="form-control mb-md status">
                                <option value="1">&nbsp;</option>
                                <option value="1" <?= isset($data) && $data->status == 1 ? "selected" : ""; ?>>Available</option>
                                <option value="2" <?= isset($data) && $data->status == 2 ? "selected" : ""; ?>>Not Available</option>
                            </select>
                            <span class="help-block">Leave this empty, stuff will be automatically registered as <b>Not Available</b></span>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-default" onclick="cancel()">Cancel</button>
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Save</button>
                    </center>
                </form>
            </div>
        </section>
    </div>
</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
@stop
@section('customJS')
<script type="text/javascript">
    
    function cancel() {
        location.href = "/stuffs"
    }
    
    $('.price').mask('000.000.000.000.000', {
        reverse: true
    });

</script>
@stop
@stop