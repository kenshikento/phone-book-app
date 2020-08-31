@extends('site.site')

@section('content')
    <div>
        <form  action="/search" method="get">
        <input type="text"  name="search" placeholder="Search.."/>
        <button type="submit">Search</button>
        </form>

        @if($page) 
            @foreach ($page as $contact)
                <h1>
                    Name : {{$contact['name']}}
                </h1>
                <p>
                    Phone Number : {{$contact['phone_number']}}
                    <br>
                    Contact Addres : {{$contact['address']}}
                </p>
            @endforeach
          --
        
            @php 
                $request = request()->query();
                
                if(!$request || !array_key_exists('filter', $request) || $request['filter'] === 'asc') {
                    $request['filter'] = 'desc';
                } else {
                    $request['filter'] = 'asc';
                }

            @endphp

            @if ($page && count($page) > 1)
                <a href="{{ request()->fullUrlWithQuery($request) }}"><button type="button" class="btn btn-primary">{{$request['filter']}}</button></a>
                {{$page->appends(Request::except('page'))->links()}}    
            @endif
        @endif
    </div>
@endsection