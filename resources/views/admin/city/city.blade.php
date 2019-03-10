
@foreach($allCity as $city)
<option value="{{ $city->id }}"> {{ $city->name_ar }} </option>
    @endforeach