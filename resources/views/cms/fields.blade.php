<!-- Page Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page_slug', 'Page Slug:') !!}    
    <select name="page_slug" id="" class="form-control custom-select" {{ isset($cms) ? 'disabled' : '' }}>
        <option value="" selected disabled >Select Page</option>
    </select>
</div>

<!-- Section Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('section_slug', 'Section Slug:') !!}
    <select name="section_slug" id="" class="form-control custom-select" {{ isset($cms) ? 'disabled' : '' }}>
        <option value="" selected disabled >Select Section</option>
    </select>
</div>

<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Key:') !!}    
    <input type="text" value="{{ isset($cms) ? $cms->key : '' }}" class="form-control" {{ isset($cms) ? 'disabled' : '' }} >
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control', 'maxlength' => config('constants.character_limits.normal_description')]) !!}
</div>

@push('page_scripts')
    <script>
        let pagesWithSections = [];
        let pages = [];

        $(document).ready(async () => {
            let response = await fetch("{{ route('getPageWithSections') }}");
            response = await response.json();
            console.log('response', response);

            if(response.status){
                pagesWithSections = response.data;
                pages = pagesWithSections.map(dt => {
                        return dt.page_slug;
                    });
                addAllSelectOptions('page_slug', pages);
            }

            $('select[name=page_slug]').on('change', async function(e){
                let selectedPageSlugElement = $(e.target);
                let selectedPageSlugValue = selectedPageSlugElement.val();

                let selectedPage = findSection(selectedPageSlugValue);

                if(!selectedPage){
                    alert('This Page`s sections are not available');
                }

                let section_slugs = selectedPage?.sections?.map(section => section.section_slug);

                console.log('section_slugs', section_slugs);
                addAllSelectOptions('section_slug', section_slugs ?? []);
            });

            let editableCms = "{{ isset($cms) ? $cms : null }}";
            editableCms = editableCms ?? null;
            console.log('editableCms', editableCms);
            editableCms = jsonParse(editableCms);
            if (editableCms) {
                $("select[name='page_slug']").val(editableCms?.page_slug).trigger('change');
                $("select[name='section_slug']").val(editableCms?.section_slug).trigger('change');
            }
        });

        let findSection = (pageSlug) => {
            return pagesWithSections.find(page => page.page_slug == pageSlug);
        }

        let makeSelectOption = (elemVal, elemText) => {
            let domElement = document.createElement('option');
            domElement.value = elemVal ?? '';
            domElement.text = elemText;
            return domElement;
        }
        let addSelectOption = (selectName, elemVal, elemText) => {
            $(`select[name=${selectName}]`).append(makeSelectOption(elemVal, elemText));
        }
        let makeEmptySelect = (selectName) => {
            $(`select[name=${selectName}]`).empty();
        }
        
        let addAllSelectOptions = (selectName, elems) => {
            makeEmptySelect(selectName)
            addSelectOption(selectName, '', `Select ${makeSlugTitleName(selectName)}`);

            elems.map(elem => {
                addSelectOption(selectName, elem, elem);
            })
        }

        let makeSlugTitleName = (slug) => {
            let originalSlug = slug.split('_').shift();
            return originalSlug.charAt(0).toUpperCase() + originalSlug.slice(1).toLowerCase();
        }



        function decodeHtml(html) {
            var txt = document.createElement('textarea');
            txt.innerHTML = html;
            return txt.value;
        }

        function jsonParse(encodedJson) {
            // Decode the JSON string
            let decodedJson = decodeHtml(encodedJson);

            // Parse the JSON string into a JavaScript object
            let jsonObject = JSON.parse(decodedJson);
            return jsonObject;
        }
    </script>
@endpush
