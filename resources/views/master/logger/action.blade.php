<div class="d-flex">
    <a href="{{ route('logger.chart', $id) }}" class="ml-2 btn btn-info">
        <span class="fas fa-chart-line"></span>
    </a>

    <a href="{{ route('logger.show', $id) }}" class="ml-2 btn btn-info">
        <span class="fas fa-eye"></span>
    </a>
    
    <form class="inline-block" action="{{ route('logger.destroy', $id) }}" method="POST">
        @csrf
        @method("delete")

        <button class="ml-2 btn btn-danger"><span class="fas fa-trash"></span></button>
    </form>
</div>