@forelse ($branches as $branch)
    <tr id="u_{{ $branch->id }}">
        <td>
            <div class="userDatatable-content">
                {{ $branch->branch_name }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                {{ $branch->branch_address }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                {{ $branch->branch_services }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                {{ $branch->branch_phone }}
            </div>
        </td>
        <td>
            <div class="userDatatable-content">
                <div class="form-check form-switch form-switch-primary form-switch-sm">
                    <input type="checkbox" class="form-check-input" id="toggleStatus"
                        {{ $branch->status == 1 ? 'checked' : '' }} onchange="changeStatus(event,{{ $branch->id }})">
                    <label class="form-check-label" for="toggleStatus"></label>
                </div>
            </div>
        </td>
        <td>
            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap justify-content-start">
                <li>
                    <a href="{{ route('dashboard.branches.edit', $branch->id) }}" class="edit" class="remove">
                        <i class="uil uil-eye"></i>
                    </a>
                </li>
                <li class="d-none">
                    <form action="{{ route('dashboard.branches.destroy', $branch->id) }}" method="POST" class="d-inline"
                        id="deleteBranchForm-{{ $branch->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn remove" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteBranch">
                            <i class="uil uil-trash-alt"></i>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteBranch" class="remove"
                        data-branch-id="{{ $branch->id }}">
                        <i class="uil uil-trash-alt"></i>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
@empty
    {{ trans('site.empty_data') }}
@endforelse
