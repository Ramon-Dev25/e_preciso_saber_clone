<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('js/plugins/argon-dashboard.min.js') }}"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<!-- NOTIFICAÇÕES -->
<script src="{{ asset('js/notification.js') }}"></script>

<!-- Select -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- JS NECESSÁRIO PARA AS NOTIFICAÇÕES -->
@if(session('notification'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let messages = @json(session('notification'));
            messages.forEach(msg => {
                showNotification(msg.type, "Sistema", msg.text, msg.duration);
            });
        });
    </script>
@endif

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script>
    function darkMode(checkbox) {
        let theme = checkbox.checked ? "dark" : "light";

        // Aplica o tema imediatamente
        document.body.classList.toggle("dark-version", theme === "dark");

        // Salva no banco
        fetch("{{ route('user.theme') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ theme: theme })
        }).then(res => res.json()).then(data => {
            console.log("Tema salvo:", data);
        }).catch(err => console.error("Erro ao salvar tema:", err));
    }
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Selecione...",
            allowClear: true
        });
    });
</script>


<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

@yield('scripts')