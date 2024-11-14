@extends('dashboard.layouts.main')
@section('css')
    <style>
        .dm-pagination__item:not(:last-child) {
            margin-right: 5px !important;
        }

        .location_link_instraction li {
            font-size: 12px
        }

        .select2-selection--single,
        .select2-container--default {
            height: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="contents">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main user-member justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center user-member__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">
                                    {{ trans('site.edit_terms_and_conditions') }} </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default card-md mb-4">
                        <div class="card-body pb-md-30">
                            <form action="{{ route('dashboard.terms.update', $terms->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $locale)
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                <label for="content"
                                                    class="il-gray fs-14 fw-500 align-center mb-10">{{ $locale['name'] }}
                                                    Content</label>
                                                <textarea class="form-control form-control-lg @error($localeCode . '.content') is-invalid @enderror editor"
                                                    id="content" name="{{ $localeCode }}[content]">
                                                    {{ old("{$localeCode}.content", $terms->translate($localeCode)->content ?? '') }}</textarea>
                                                @error($localeCode . '.content')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-default btn-squared " type="submit">
                                            {{ trans('site.edit_terms_and_conditions') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="importmap">
    {
        "imports": {
            "ckeditor5": "{{ asset('dashboard/assets/vendor_assets/js/ckeditor5.js') }}",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Autoformat,
        Bold,
        Italic,
        Underline,
        BlockQuote,
        Base64UploadAdapter,
        CloudServices,
        CKBox,
        Essentials,
        Heading,
        Image,
        ImageCaption,
        ImageResize,
        ImageStyle,
        ImageToolbar,
        ImageUpload,
        PictureEditing,
        Indent,
        IndentBlock,
        Link,
        List,
        MediaEmbed,
        Mention,
        Paragraph,
        PasteFromOffice,
        Table,
        TableColumnResize,
        TableToolbar,
        TextTransformation,
    } from 'ckeditor5';

    // Select all elements with the class "editor"
    document.querySelectorAll('.editor').forEach(editorElement => {
        ClassicEditor.create(editorElement, {
                plugins: [
                    Autoformat,
                    BlockQuote,
                    Bold,
                    CloudServices,
                    Essentials,
                    Heading,
                    Image,
                    ImageCaption,
                    ImageResize,
                    ImageStyle,
                    ImageToolbar,
                    ImageUpload,
                    Base64UploadAdapter,
                    Indent,
                    IndentBlock,
                    Italic,
                    Link,
                    List,
                    MediaEmbed,
                    Mention,
                    Paragraph,
                    PasteFromOffice,
                    PictureEditing,
                    Table,
                    TableColumnResize,
                    TableToolbar,
                    TextTransformation,
                    Underline,
                ],
                toolbar: [
                    'undo',
                    'redo',
                    '|',
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    '|',
                    'link',
                    'uploadImage',
                    'ckbox',
                    'insertTable',
                    'blockQuote',
                    'mediaEmbed',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    ],
                },
                image: {
                    resizeOptions: [
                        { name: 'resizeImage:original', label: 'Default image width', value: null },
                        { name: 'resizeImage:50', label: '50% page width', value: '50' },
                        { name: 'resizeImage:75', label: '75% page width', value: '75' },
                    ],
                    toolbar: [
                        'imageTextAlternative',
                        'toggleImageCaption',
                        '|',
                        'imageStyle:inline',
                        'imageStyle:wrapText',
                        'imageStyle:breakText',
                        '|',
                        'resizeImage',
                    ],
                },
                link: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'],
                },
            })
            .then(editor => {
                // Optional: Add the editor instance to an array if you want to manage them
                window.editors = window.editors || [];
                window.editors.push(editor);
            })
            .catch(error => {
                console.error(error.stack);
            });
    });
</script>

@endsection
