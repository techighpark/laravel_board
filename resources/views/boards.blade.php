@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->

    <div>
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('board') }}" method="POST">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div>
                <label for="task">Content</label>

                <div>
                    <input type="text" name="name">
                </div>
            </div>

            <!-- Add Task Button -->
            <div>
                <div>
                    <button type="submit">
                         Create
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Current Tasks -->
    @if (count($boards) > 0)
        <div>
            <div>
                Laravel - Board
            </div>

            <div>
                <table>

                    <!-- Table Headings -->
                    <thead>
                        <th>List</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($boards as $board)
                        <tr>
                            <!-- Task Name -->
                            <td >
                                <div>{{ $board->name }}</div>
                            </td>

                            <!-- Delete Button -->
                            <td>
                                <form action="{{ url('board/'.$board->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit">
                                    Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection