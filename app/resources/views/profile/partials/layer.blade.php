<option value="" {{ empty($selected) ? 'selected' : '' }}>選択してください</option>
<option value="1" {{ isset($selected) && $selected == '1' ? 'selected' : '' }}>1</option>
<option value="2" {{ isset($selected) && $selected == '2' ? 'selected' : '' }}>2</option>
<option value="3" {{ isset($selected) && $selected == '3' ? 'selected' : '' }}>3</option>
<option value="4" {{ isset($selected) && $selected == '4' ? 'selected' : '' }}>4</option>
<option value="5" {{ isset($selected) && $selected == '5' ? 'selected' : '' }}>5</option>