<!-- resources/views/stopwatch.blade.php -->
@extends('master')

@section('content')
<div class="text-center mt-5">
    <h1 class="mb-4" style="font-size: 2rem;">Debonair U-1 IE Stopwatch</h1>

    <!-- Stopwatch Display -->
    <div class="d-flex justify-content-center align-items-center gap-1 display-3 p-3" style="
        font-family: 'Courier New', monospace;
        background: linear-gradient(145deg, #3a3a3a, #262626);
        color: #0f0;
        max-width: 350px;
        border-radius: 15px;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5), 
                    -4px -4px 10px rgba(255, 255, 255, 0.1);
        border: 2px solid #333;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        margin: 0 auto;
    ">
        <div class="time-section p-2" style="background: #333; border-radius: 8px;">
            <span id="hours">00</span>
        </div>
        <span>:</span>
        <div class="time-section p-2" style="background: #333; border-radius: 8px;">
            <span id="minutes">00</span>
        </div>
        <span>:</span>
        <div class="time-section p-2" style="background: #333; border-radius: 8px;">
            <span id="seconds">00</span>
        </div>
        <span>.</span>
        <div class="time-section p-2" style="background: #333; border-radius: 8px;">
            <span id="milliseconds">00</span>
        </div>
    </div>

    <!-- Control Buttons -->
    <div class="mt-4">
    <button id="startStopButton" class="btn btn-success btn-lg me-3 custom-btn">
        <i class="fas fa-stopwatch"></i> Start
    </button>
    <button id="lapButton" class="btn btn-primary btn-lg me-3 custom-btn" disabled>
        <i class="fas fa-stopwatch"></i> Lap
    </button>
    <button id="resetButton" class="btn btn-danger btn-lg custom-btn" disabled>
        <i class="fas fa-undo"></i> Reset
    </button>
</div>

<style>
    .custom-btn {
        border-radius: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2), 0 -2px 5px rgba(255, 255, 255, 0.1) inset;
        transition: transform 0.2s, box-shadow 0.2s;
        padding: 12px 24px;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Give it a slight "pressed" effect on click */
    .custom-btn:active {
        transform: translateY(2px);
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2), 0 -1px 3px rgba(255, 255, 255, 0.1) inset;
    }

    /* Specific colors for each button type */
    #startStopButton {
        background: linear-gradient(145deg, #28a745, #218838);
    }
    #lapButton {
        background: linear-gradient(145deg, #007bff, #0069d9);
    }
    #resetButton {
        background: linear-gradient(145deg, #dc3545, #c82333);
    }

    /* Add a subtle hover effect */
    .custom-btn:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3), 0 -2px 5px rgba(255, 255, 255, 0.1) inset;
    }
</style>

    <!-- Cycle Time Display -->
    <div class="mt-5 p-3 rounded" style="background-color: #222; color: #ddd;">
        <h4 style="color: #00ff00; text-shadow: 1px 1px 4px rgba(0,255,0,0.8);">Cycle Times:</h4>
        <ul id="cycleTimesList" class="list-unstyled" style="max-height: 200px; overflow-y: auto; border: 1px solid #555; padding: 10px; background: #111; border-radius: 5px;"></ul>

        <div class="mt-3 p-2" style="border-top: 1px solid #555; display: flex; justify-content: space-between; align-items: center;">
            <strong style="color: #00ffff;">Total Cycle Time:</strong> 
            <span id="totalCycleTime" style="color: #fff; font-weight: bold; font-size: 1.2rem; text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.5);">00:00:00.00</span>
            <button onclick="printCycleTimes()" class="btn btn-secondary btn-sm ms-3">Print</button>
        </div>
    </div>
</div>

<!-- Stopwatch Script -->
<script>
    let timerInterval;
    let elapsedMilliseconds = 0;
    let running = false;
    let lapTimes = [];
    let totalCycleMilliseconds = 0;

    const hoursDisplay = document.getElementById('hours');
    const minutesDisplay = document.getElementById('minutes');
    const secondsDisplay = document.getElementById('seconds');
    const millisecondsDisplay = document.getElementById('milliseconds');
    const startStopButton = document.getElementById('startStopButton');
    const resetButton = document.getElementById('resetButton');
    const lapButton = document.getElementById('lapButton');
    const cycleTimesList = document.getElementById('cycleTimesList');
    const totalCycleTimeDisplay = document.getElementById('totalCycleTime');

    function updateDisplay() {
        const hours = String(Math.floor(elapsedMilliseconds / 3600000)).padStart(2, '0');
        const minutes = String(Math.floor((elapsedMilliseconds % 3600000) / 60000)).padStart(2, '0');
        const seconds = String(Math.floor((elapsedMilliseconds % 60000) / 1000)).padStart(2, '0');
        const milliseconds = String(Math.floor((elapsedMilliseconds % 1000) / 10)).padStart(2, '0');
        
        hoursDisplay.textContent = hours;
        minutesDisplay.textContent = minutes;
        secondsDisplay.textContent = seconds;
        millisecondsDisplay.textContent = milliseconds;
    }

    function updateTotalCycleTime() {
        const hours = String(Math.floor(totalCycleMilliseconds / 3600000)).padStart(2, '0');
        const minutes = String(Math.floor((totalCycleMilliseconds % 3600000) / 60000)).padStart(2, '0');
        const seconds = String(Math.floor((totalCycleMilliseconds % 60000) / 1000)).padStart(2, '0');
        const milliseconds = String(Math.floor((totalCycleMilliseconds % 1000) / 10)).padStart(2, '0');
        
        totalCycleTimeDisplay.textContent = `${hours}:${minutes}:${seconds}.${milliseconds}`;
    }

    function toggleStartStop() {
        if (running) {
            clearInterval(timerInterval);
            startStopButton.textContent = 'Start';
            // Update background to green for Start
            startStopButton.style.background = 'linear-gradient(145deg, #28a745, #218838)';
            lapButton.disabled = true;
        } else {
            const startTime = Date.now() - elapsedMilliseconds;
            timerInterval = setInterval(() => {
                elapsedMilliseconds = Date.now() - startTime;
                updateDisplay();
            }, 10);
            startStopButton.textContent = 'Stop';
            // Update background to red for Stop
            startStopButton.style.background = 'linear-gradient(145deg, #dc3545, #c82333)';
            lapButton.disabled = false;
            resetButton.disabled = false;
        }
        running = !running;
    }

    function recordLap() {
        lapTimes.push(elapsedMilliseconds);
        totalCycleMilliseconds += elapsedMilliseconds;

        const lapTime = formatTime(elapsedMilliseconds);
        const listItem = document.createElement('li');
        listItem.textContent = `Lap ${lapTimes.length}: ${lapTime}`;
        cycleTimesList.appendChild(listItem);

        updateTotalCycleTime();
    }

    function resetAll() {
        elapsedMilliseconds = 0;
        totalCycleMilliseconds = 0;
        lapTimes = [];
        updateDisplay();
        updateTotalCycleTime();
        cycleTimesList.innerHTML = '';
        startStopButton.textContent = 'Start';
        // Reset background to green for Start
        startStopButton.style.background = 'linear-gradient(145deg, #28a745, #218838)';
        startStopButton.disabled = false;
        lapButton.disabled = true;
        resetButton.disabled = true;
    }

    function formatTime(milliseconds) {
        const hours = String(Math.floor(milliseconds / 3600000)).padStart(2, '0');
        const minutes = String(Math.floor((milliseconds % 3600000) / 60000)).padStart(2, '0');
        const seconds = String(Math.floor((milliseconds % 60000) / 1000)).padStart(2, '0');
        const ms = String(Math.floor((milliseconds % 1000) / 10)).padStart(2, '0');
        return `${hours}:${minutes}:${seconds}.${ms}`;
    }

    function printCycleTimes() {
        let printContents = "<h3>Debonair U-1 IE Stopwatch - Cycle Times</h3><ul>";
        lapTimes.forEach((time, index) => {
            printContents += `<li>${index + 1}. ${formatTime(time)}</li>`;
        });
        printContents += `</ul><strong>Total Cycle Time:</strong> ${totalCycleTimeDisplay.textContent}`;

        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Cycle Times</title></head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }

    startStopButton.addEventListener('click', toggleStartStop);
    lapButton.addEventListener('click', recordLap);
    resetButton.addEventListener('click', resetAll);
</script>
@endsection
