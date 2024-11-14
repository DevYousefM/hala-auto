@forelse ($sliders as $slider)
<tr id="u_{{ $slider->id }}">
    <td>
        <img src="{{ $slider->image }}" height="70" width="125px">
    </td>
    <td>
        <div class="userDatatable-content">
            {{ $slider->title }}
        </div>
    </td>
    <td>
        <div class="userDatatable-content">
            <div class="form-check form-switch form-switch-primary form-switch-sm">
                <input type="checkbox" class="form-check-input" id="toggleStatus"
                    {{ $slider->status == 1 ? 'checked' : '' }}
                    onchange="changeStatus(event,{{ $slider->id }})">
                <label class="form-check-label" for="toggleStatus"></label>
            </div>
        </div>
    </td>
    <td>
        <ul
            class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
            <li>
                <a href="{{ route('dashboard.sliders.edit', $slider->id) }}"
                    class="edit" class="remove">
                    <i class="uil uil-eye"></i>
                </a>
            </li>
            <li class="d-none">
                <form
                    action="{{ route('dashboard.sliders.destroy', $slider->id) }}"
                    method="POST" class="d-inline"
                    id="deleteSliderForm-{{ $slider->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn remove" data-bs-toggle="modal"
                        data-bs-target="#modalDeleteSlider">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                </form>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#modalDeleteSlider" class="remove"
                    data-slider-id="{{ $slider->id }}">
                    <i class="uil uil-trash-alt"></i>
                </a>
            </li>
        </ul>
    </td>
</tr>
@empty
{{ trans('site.empty_data') }}
@endforelse
