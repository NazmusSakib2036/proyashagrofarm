<label>Label</label>
<input type="text" name="label" value="{{ old('label', $stat->label ?? '') }}" required>

<label>Value</label>
<input type="number" name="value" min="0" value="{{ old('value', $stat->value ?? 0) }}" required>

<label>Suffix (optional)</label>
<input type="text" name="suffix" value="{{ old('suffix', $stat->suffix ?? '') }}">

<label>Sort Order</label>
<input type="number" name="sort_order" min="0" value="{{ old('sort_order', $stat->sort_order ?? 0) }}">
