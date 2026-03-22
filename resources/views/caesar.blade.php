<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cipher . caesar</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #0a0c0f;
            font-family: Arial;
        }

        .card {
            background: #111316;
            border-radius: 20px;
            padding: 25px;
            color: white;
            transition: 0.3s;
        }
.card:hover {
    transform: scale(1.02);
}
        .input-field {
            background: #1a1e24;
            border: 1px solid #2a313a;
            color: white;
            border-radius: 10px;
        }

        .btn-process {
            background: #242a33;
            border: 1px solid #37414b;
            border-radius: 10px;
        }

        .result-area {
            background: #151a20;
            border-radius: 10px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">

<div class="card w-full max-w-xl">

    <h2 class="text-xl mb-4">Caesar Cipher</h2>

    <!-- FORM -->
    <form method="POST" action="/caesar-process">
        @csrf

        <!-- INPUT -->
        <textarea 
            name="text"
            id="inputText"
            rows="4"
            class="input-field w-full p-3"
            placeholder="Masukkan teks...">{{ $text ?? '' }}</textarea>

        <div class="grid grid-cols-2 gap-3 mt-3">

            <!-- SHIFT -->
            <input 
                type="number"
                name="shift"
                min="1"
                max="25"
                value="{{ $shift ?? 3 }}"
                class="input-field p-2">

            <!-- MODE -->
            <select name="action" class="input-field p-2">
                <option value="encrypt" {{ ($mode ?? '') == 'encrypt' ? 'selected' : '' }}>Enkripsi</option>
                <option value="decrypt" {{ ($mode ?? '') == 'decrypt' ? 'selected' : '' }}>Dekripsi</option>
            </select>

        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-process w-full mt-4 p-3">
            Proses
        </button>
    </form>

    <!-- HASIL -->
    @if(isset($result))
    <div class="result-area mt-5 p-3">
        <p id="resultText">{{ $result }}</p>

        <button onclick="copyText()" class="mt-2 bg-gray-700 px-3 py-1 rounded">
            Copy
        </button>
    </div>
    @endif

    <!-- BACK -->
    <div class="mt-4">
        <a href="/dashboard" class="text-blue-400">← Kembali ke Dashboard</a>
    </div>

    <!-- COUNTER -->
    <p id="charCount" class="text-sm mt-2">0 huruf</p>

</div>

<script>
    const input = document.getElementById('inputText');
    const counter = document.getElementById('charCount');

    input.addEventListener('input', function() {
        counter.textContent = this.value.length + " huruf";
    });

    function copyText() {
        const text = document.getElementById('resultText').innerText;
        navigator.clipboard.writeText(text);
        alert("Tersalin!");
    }
</script>

</body>
</html>