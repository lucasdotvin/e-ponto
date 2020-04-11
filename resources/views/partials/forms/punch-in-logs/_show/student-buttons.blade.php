@php
    $logEditRouteName = 'student.punch-in-logs.edit';
    $logEditRoute = route(
        $logEditRouteName,
        $punchInLog
    );
@endphp

<div class="field is-grouped is-grouped-right">
    <div class="control">
        <div class="field">
            <div class="control">
                <a
                    class="button is-fullwidth"
                    href="{{ $logEditRoute }}"
                >
                    <span class="icon">
                        <i class="fas fa-pen"></i>
                    </span>

                    <span>
                        Editar
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="contr">
        <div class="field">
            <div class="control">
                <form method="POST">
                    @method('DELETE')
                    @csrf

                    <button
                        class="button is-fullwidth is-danger is-outlined"
                        type="submit"
                    >
                        <span class="icon">
                            <i class="fas fa-trash"></i>
                        </span>

                        <span>
                            Remover
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
