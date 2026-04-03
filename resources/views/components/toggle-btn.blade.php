<div class="toggle" id="toggle" onclick="switchMode()">
    <div class="knob" id="knob">
        <!-- person icon -->
    </div>
    <span class="toggle-label unenrolled-label">UNENROLLED</span>
    <span class="toggle-label enrolled-label">ENROLLED</span>
</div>

<script>
    let enrolled = false;

    function switchMode() {
        enrolled = !enrolled;
        document.getElementById('toggle').classList.toggle('enrolled', enrolled);
        // swap icon stroke color based on state
    }
</script>
