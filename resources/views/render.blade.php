    <form action="{{ route('addhourlyproduction') }}" method="post" mul>
        @csrf
        @foreach ($lines as $line)
            <tr>
                <td> {{ $line->name }} <input style="max-width:55px;" type="hidden" name="line_id[]" readonly></td>
                <td cope="col"><input style="max-width:65px;" type="text" name="buyer[]"></td>
                <td cope="col"><input style="max-width:65px;" type="text" name="style[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="day_tar[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="hourly_tar[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="1st[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="2nd[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="3rd[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="4th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="5th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="6th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="7th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="8th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="9th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="10th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="11th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="12th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="13th[]"></td>
                <td cope="col"><input style="max-width:55px;" type="number" name="14th[]"></td>

            </tr>
        @endforeach
        <div class="card-footer">
            <button type="submit" class="btn btn-info ">Submit</button>
        </div>
    </form>
