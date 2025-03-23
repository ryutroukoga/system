<option value="" {{ empty($selected) ? 'selected' : '' }}>選択してください</option>
<option value="東京" {{ (isset($selected) && $selected === '東京') ? 'selected' : '' }}>東京</option>
<option value="大阪" {{ (isset($selected) && $selected === '大阪') ? 'selected' : '' }}>大阪</option>
<option value="愛知" {{ (isset($selected) && $selected === '愛知') ? 'selected' : '' }}>愛知</option>
<option value="名古屋" {{ (isset($selected) && $selected === '名古屋') ? 'selected' : '' }}>名古屋</option>
<option value="福岡" {{ (isset($selected) && $selected === '福岡') ? 'selected' : '' }}>福岡</option>