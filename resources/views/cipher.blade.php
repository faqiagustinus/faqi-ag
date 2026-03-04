<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cipher . p balap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Space Grotesk', sans-serif;
        }
        
        body {
            background: #0a0c0f;
            background-image: 
                radial-gradient(circle at 25% 0%, rgba(45, 55, 72, 0.15) 0%, transparent 40%),
                radial-gradient(circle at 85% 100%, rgba(45, 55, 72, 0.1) 0%, transparent 45%);
        }

        .card {
            background: #111316;
            border: 1px solid #262b33;
            border-radius: 20px;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.8);
        }

        .card-glow {
            position: relative;
        }

        .card-glow::after {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            border-radius: 21px;
            background: linear-gradient(145deg, #2d3748, transparent 60%);
            opacity: 0.15;
            pointer-events: none;
        }

        .input-field {
            background: #1a1e24;
            border: 1.5px solid #2a313a;
            color: #e5e9f0;
            transition: all 0.2s ease;
            border-radius: 14px;
        }

        .input-field:focus {
            border-color: #5f6b7a;
            background: #1f242b;
            box-shadow: 0 0 0 3px rgba(95, 107, 122, 0.15);
        }

        .input-field:hover {
            border-color: #3f4a57;
        }

        .btn-process {
            background: #242a33;
            border: 1px solid #37414b;
            color: #cdd6e6;
            font-weight: 500;
            border-radius: 14px;
            transition: all 0.15s ease;
        }

        .btn-process:hover {
            background: #2c333d;
            border-color: #4a5664;
            color: white;
        }

        .btn-process:active {
            background: #1f252d;
            transform: scale(0.98);
        }

        .result-area {
            background: #151a20;
            border: 1px solid #2a313a;
            border-radius: 16px;
        }

        .tag {
            background: #1f262e;
            border: 1px solid #313c48;
            color: #8f9eb5;
            font-size: 0.7rem;
            padding: 4px 10px;
            border-radius: 30px;
            letter-spacing: 0.3px;
        }

        .copy-btn {
            background: #1f262e;
            border: 1px solid #313c48;
            color: #8f9eb5;
            border-radius: 30px;
            transition: all 0.15s ease;
            font-size: 0.75rem;
        }

        .copy-btn:hover {
            background: #2a333d;
            border-color: #44515f;
            color: #d1dbea;
        }

        .counter {
            color: #5a6778;
            font-size: 0.75rem;
            border-top: 1px solid #20262d;
            padding-top: 1rem;
            margin-top: 1rem;
        }

        /* custom scrollbar biar lebih kerasa handmade */
        textarea::-webkit-scrollbar {
            width: 8px;
        }

        textarea::-webkit-scrollbar-track {
            background: #1a1e24;
            border-radius: 8px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #37414b;
            border-radius: 8px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: #45515e;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-5">
    
    <div class="card card-glow w-full max-w-xl p-7 relative">
        <!-- header simpel aja, ga perlu gradien norak -->
        <div class="flex items-center justify-between mb-7">
            <div>
                <h1 class="text-2xl font-medium text-[#dde3ed] tracking-tight">cipher . p balap</h1>
                <div class="flex items-center gap-2 mt-1">
                    <span class="tag">caesar</span>
                    <span class="tag">shift 1-25</span>
                </div>
            </div>
            <div class="text-3xl opacity-30 rotate-12">↻</div>
        </div>

        <!-- main area -->
        <div class="space-y-4">
            <!-- input text -->
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-xs text-[#5f738c] uppercase tracking-wider">tulis pesan</span>
                    <span class="text-[#37414b] text-xs"></span>
                </div>
                <textarea 
                    id="inputText" 
                    rows="4" 
                    class="input-field w-full px-4 py-3.5 text-sm resize-none"
                    placeholder="apa aja dah...."></textarea>
            </div>

            <!-- 2 kolom setting -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs text-[#5f738c] mb-2 tracking-wide">shift</label>
                    <div class="relative">
                        <input 
                            type="number" 
                            id="shift" 
                            min="1" 
                            max="25" 
                            value="3"
                            class="input-field w-full px-4 py-3 text-sm">
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[#4a5768] text-xs">×</span>
                    </div>
                </div>
                <div>
                    <label class="block text-xs text-[#5f738c] mb-2 tracking-wide">mode</label>
                    <select 
                        id="action"
                        class="input-field w-full px-4 py-3 text-sm appearance-none">
                        <option value="encrypt" class="bg-[#1a1e24]">enkripsi</option>
                        <option value="decrypt" class="bg-[#1a1e24]">dekripsi</option>
                    </select>
                </div>
            </div>

            <!-- tombol proses - simpel aja -->
            <button 
                id="processBtn" 
                class="btn-process w-full py-3.5 text-sm mt-2 flex items-center justify-center gap-2">
                <span>proses</span>
                <span class="text-lg opacity-50"></span>
            </button>

            <!-- hasil -->
            <div id="resultCard" class="hidden result-area p-5 mt-4">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-[#5f738c]">hasil</span>
                        <span class="w-1 h-1 bg-[#3d4b5c] rounded-full"></span>
                        <span id="modeIndicator" class="text-xs text-[#6f829c]">enkripsi</span>
                    </div>
                    <button 
                        id="copyBtn" 
                        class="copy-btn px-4 py-1.5 flex items-center gap-1.5">
                        <span>⎘</span>
                        <span>salin</span>
                    </button>
                </div>
                <div class="bg-[#0f141a] rounded-xl p-4 border border-[#262e37]">
                    <p id="resultText" class="text-[#d1dbea] break-words font-mono text-sm leading-relaxed"></p>
                </div>
            </div>

            <!-- loading kecil aja -->
            <div id="loading" class="hidden flex items-center justify-center gap-3 py-3">
                <div class="w-5 h-5 border-2 border-[#2f3945] border-t-[#5f738c] rounded-full animate-spin"></div>
                <span class="text-sm text-[#5f738c]">...</span>
            </div>

            <!-- counter & random note -->
            <div class="counter flex items-center justify-between">
                <span id="charCount" class="text-[#4b5a6e]">0 huruf</span>
                <span class="text-[#303b48] text-xs">geser huruf sesuai nilai shift</span>
            </div>
        </div>
    </div>

    <script>
        // ambil element
        const processBtn = document.getElementById('processBtn');
        const inputText = document.getElementById('inputText');
        const shift = document.getElementById('shift');
        const action = document.getElementById('action');
        const resultCard = document.getElementById('resultCard');
        const resultText = document.getElementById('resultText');
        const loading = document.getElementById('loading');
        const copyBtn = document.getElementById('copyBtn');
        const charCount = document.getElementById('charCount');
        const modeIndicator = document.getElementById('modeIndicator');

        // update counter
        inputText.addEventListener('input', function() {
            const count = this.value.length;
            charCount.textContent = count + ' ' + (count === 1 ? 'huruf' : 'huruf');
        });

        // fungsi cipher sederhana
        function geserTeks(text, shiftValue, mode) {
            let result = '';
            const geser = mode === 'encrypt' ? shiftValue : -shiftValue;
            
            for (let i = 0; i < text.length; i++) {
                let char = text[i];
                let code = text.charCodeAt(i);
                
                // huruf besar A-Z
                if (code >= 65 && code <= 90) {
                    result += String.fromCharCode(((code - 65 + geser + 26) % 26) + 65);
                }
                // huruf kecil a-z
                else if (code >= 97 && code <= 122) {
                    result += String.fromCharCode(((code - 97 + geser + 26) % 26) + 97);
                }
                // lainnya (angka, spasi, simbol) dibiarin
                else {
                    result += char;
                }
            }
            return result;
        }

        // event process
        processBtn.addEventListener('click', function() {
            const text = inputText.value;
            
            if (!text) {
                // kasih efek merah tipis
                inputText.style.borderColor = '#5f3f4a';
                setTimeout(() => {
                    inputText.style.borderColor = '#2a313a';
                }, 500);
                return;
            }

            // loading
            loading.classList.remove('hidden');
            resultCard.classList.add('hidden');
            processBtn.disabled = true;
            processBtn.style.opacity = '0.5';

            // simulasi proses dikit biar ga instant (biar kerasa ada effort)
            setTimeout(() => {
                const shiftValue = parseInt(shift.value) || 3;
                const mode = action.value;
                const hasil = geserTeks(text, shiftValue, mode);
                
                resultText.textContent = hasil;
                modeIndicator.textContent = mode === 'encrypt' ? 'hasil enkripsi' : 'hasil dekripsi';
                resultCard.classList.remove('hidden');
                
                loading.classList.add('hidden');
                processBtn.disabled = false;
                processBtn.style.opacity = '1';
            }, 300);
        });

        // copy ke clipboard
        copyBtn.addEventListener('click', function() {
            const teks = resultText.textContent;
            if (!teks) return;
            
            navigator.clipboard.writeText(teks).then(() => {
                const originalText = this.innerHTML;
                this.innerHTML = '<span>✓</span><span>tersalin</span>';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 1500);
            });
        });

        // validasi shift biar ga aneh
        shift.addEventListener('input', function() {
            let value = parseInt(this.value);
            if (isNaN(value)) this.value = 3;
            if (value < 1) this.value = 1;
            if (value > 25) this.value = 25;
        });

        // shortcut: alt + enter
        inputText.addEventListener('keydown', function(e) {
            if (e.altKey && e.key === 'Enter') {
                e.preventDefault();
                processBtn.click();
            }
        });

        // random tiny detail: kalo input dikit, counter warna berubah
        inputText.addEventListener('input', function() {
            if (this.value.length > 0) {
                charCount.style.color = '#6f829c';
            } else {
                charCount.style.color = '#4b5a6e';
            }
        });

        // initial counter
        charCount.textContent = '0 huruf';
    </script>
</body>
</html>