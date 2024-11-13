@forelse ($products as $product)
<tr id="u_{{ $product->id }}">
    <td>
        <img src="{{ $product->thumbnail }}" height="70" width="125px">
    </td>
    <td>
        <div class="userDatatable-content">
            {{ $product->name }}
        </div>
    </td>
    <td>
        <div class="userDatatable-content">
            <div class="form-check form-switch form-switch-primary form-switch-sm">
                <input type="checkbox" class="form-check-input" id="toggleStatus"
                    {{ $product->status == 1 ? 'checked' : '' }}
                    onchange="changeStatus(event,{{ $product->id }})">
                <label class="form-check-label" for="toggleStatus"></label>
            </div>
        </div>
    </td>
    <td>
        <ul
            class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
            <li>
                <a href="{{ route('dashboard.products.edit', $product->id) }}"
                    class="edit" class="remove">
                    <i class="uil uil-eye"></i>
                </a>
            </li>
            <li class="d-none">
                <form
                    action="{{ route('dashboard.products.destroy', $product->id) }}"
                    method="POST" class="d-inline"
                    id="deleteproductForm-{{ $product->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn remove" data-bs-toggle="modal"
                        data-bs-target="#modalDeleteproduct">
                        <i class="uil uil-trash-alt"></i>
                    </button>
                </form>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal"
                    data-bs-target="#modalDeleteproduct" class="remove"
                    data-product-id="{{ $product->id }}">
                    <i class="uil uil-trash-alt"></i>
                </a>
            </li>
        </ul>
    </td>
</tr>
@empty
{{ trans('site.empty_data') }}
@endforelse
