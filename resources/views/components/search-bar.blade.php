@props(['details'])
<div class="inline-flex">
    <form method="POST" action="search">
    @csrf
        <select name="category" id="category">
            <option value="">Categories</option>
            @foreach ($details['categories'] as $category){
                <option value="{{$category->Category}}">{{$category->Category}}</option>
            }   
            @endforeach
        </select>
        <select name="type" id="type">
            <option value="">Types</option>
            @foreach ($details['types'] as $type){
                <option value="{{$type->Type}}">{{$type->Type}}</option>
            }  
            @endforeach
        </select>
        <select name="genre" id="genre">
            <option value="">Genres</option>
            @foreach ($details['genres'] as $genre){
                <option value="{{$genre->Genre}}">{{$genre->Genre}}</option>
            }   
            @endforeach
        </select>

        <button type="submit">Search</button>
    </form>
</div>