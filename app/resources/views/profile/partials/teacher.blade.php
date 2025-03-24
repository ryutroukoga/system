<option value="" {{ old('teacher_id') ? '' : 'selected' }}>選択してください</option>
@foreach($teachers as $teacher)
    <option value="{{ $teacher->id }}" 
        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
        {{ $teacher->name }}
    </option>
@endforeach
