<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiSelect Virtual</title>
    <script src="https://cdn.jsdelivr.net/npm/virtual-select-plugin@1.0.39/dist/virtual-select.min.js" integrity="sha256-Gsn2XyJGdUeHy0r4gaP1mJy1JkLiIWY6g6hJhV5UrIw=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/virtual-select-plugin@1.0.39/dist/virtual-select.min.css" integrity="sha256-KqTuc/vUgQsb5EMyyxWf62qYinMUXDpWELyNx+cCUr0=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public/select') }}/css/style.css">
</head>
<body>
    <div>
        <label>Multiple Select</label>
        <select id="multipleSelect" multiple name="native-select" placeholder="Native Select" data-search="true" data-silent-initial-value-set="true">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
    </div>
    
    <script type="text/javascript">
        VirtualSelect.init({ 
        ele: '#multipleSelect' 
        });  
    </script>
</body>
</html>