<tr>
    <th scope="row">{{ $stock->ingredients->name }}</th>
    <td>{{ $stock->quantity }}</td>
    <td><a class="btn btn-primary btn-sm btn-outline-secondary" href="{{ URL::to('stocks/' . $stock->id) }}" role="button">View</a></td>
    <td><a class="btn btn-primary btn-sm btn-outline-secondary" href="{{ URL::to('stocks/' . $stock->id) . '/edit' }}" role="button">Edit</a></td>
    <td>
        <form action="{{ URL::to('/stocks/destroy/'.$stock->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-primary btn-sm btn-outline-secondary" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
        </form>
    </td>
</tr>