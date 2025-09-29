var pointSystem = new PointSystem();
var streaks = new Streaks();
var pointsTxt;
var totalPoints = 0;
var streaksTxt;

document.addEventListener('DOMContentLoaded', () => {
    pointsTxt = document.getElementById("points-text");
    streaksTxt = document.getElementById("streaks-text");
  // Resetat quiz start
    if (pointSystem  && streaks) {
        pointSystem.resetTotalPoints();
        streaks.resetStreak();
        pointsTxt.innerHTML = '0';
    }

    // Maybe add a start button here? To start the quiz

     // then start timer for first question..
    if (pointSystem ) {
        pointSystem.resetTimer();
        pointSystem.startTimer();
    }
});

function getQuizAnswer(button) {
    const parent = button.closest('.question-step');

    // Remove selection and highlight from all answer buttons in this question
    parent.querySelectorAll('.button-layout').forEach(b => {
        b.classList.remove('ring-4', 'ring-green-500', 'ring-red-500');
        delete b.dataset.selected;
    });
    button.classList.add('ring-4', 'ring-black-500');

    button.dataset.selected = "true";
    // Hide feedback and next button if user changes answer before checking
    const step = parent.dataset.step;
    document.getElementById('feedback-' + step).style.display = 'none';
    document.getElementById('next-btn-' + step).style.display = 'none';
    document.getElementById('check-btn-' + step).style.display = '';
}

function checkAnswer(step) {
    const current = document.querySelector(`.question-step[data-step="${step}"]`);
    const selectedBtn = current.querySelector('[data-selected="true"]');
    const feedback = document.getElementById('feedback-' + step);

    // If no answer has been selected
    if (!selectedBtn) {
        feedback.textContent = "Kies eerst een antwoord.";
        feedback.style.color = "red";
        feedback.style.display = '';
        return;
    }   

    // Disable all answer buttons and add borders
    current.querySelectorAll('.button-layout').forEach(b => {
        b.disabled = true;
        b.classList.remove('ring-4', 'ring-black-500', 'ring-green-500', 'ring-red-500');
        if (b.dataset.correct == "1") {
        b.classList.add('ring-4', 'ring-green-500');
        }
    });
    // Check if correct
    if (selectedBtn.dataset.correct == "1") {
        feedback.textContent = "Goed gedaan! Dit is het correcte antwoord.";
        feedback.style.color = "green";

        pointSystem.stopTimer();
        var elapsedTime = pointSystem.getCurrentTime();
        var points = pointSystem.getCalculatedCurrentPoints(elapsedTime);

        streaks.setStreak(points);

        totalPoints += points;

        // Update the points 
        if (pointsTxt) {
        const oldPoints = parseInt(pointsTxt.innerHTML) || 0;
        animatePoints(oldPoints, totalPoints);
        }
        } else {
        // 0, because no points have been gained 
        streaks.setStreak(0);

        // Find the correct answer text
        const correctBtn = current.querySelector('[data-correct="1"]');
        const correctText = correctBtn ? correctBtn.textContent.trim() : '';
        feedback.textContent = `Helaas, je had de vraag fout. Het juiste antwoord was: ${correctText}`;
        feedback.style.color = "red";
    }
    feedback.style.display = '';

    var curStreak = streaks.getCurStreak();
    streaksTxt.innerHTML = curStreak.toString();

    document.getElementById('next-btn-' + step).style.display = '';
    document.getElementById('check-btn-' + step).style.display = 'none';
}

// Smoothly animates the points counter from oldValue to newValue
function animatePoints(oldValue, newValue, duration = 700) {
    const pointsElem = pointsTxt;
    const start = oldValue;
    const end = newValue;
    const range = end - start;
    const startTime = performance.now();

    function step(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const value = Math.round(start + range * progress);
        pointsElem.innerHTML = value;
        if (progress < 1) {
        requestAnimationFrame(step);
        } else {
        pointsElem.innerHTML = end; // Ensure final value
        }
    }
    requestAnimationFrame(step);
}

function nextQuestion(step) {
    const current = document.querySelector(`.question-step[data-step="${step}"]`);
    const next = document.querySelector(`.question-step[data-step="${step+1}"]`);

    // Hide feedback and next button for current question
    document.getElementById('feedback-' + step).style.display = 'none';
    document.getElementById('next-btn-' + step).style.display = 'none';
    document.getElementById('check-btn-' + step).style.display = '';

    // Reset selected state and enable buttons
    current.querySelectorAll('.button-layout').forEach(b => {
        b.classList.remove('ring-4', 'ring-black-500', 'ring-green-500', 'ring-red-500');
        delete b.dataset.selected;
        b.disabled = false;
    });

    current.classList.add('hidden');
    if (next) {
        next.classList.remove('hidden');
        // Start timer for next question
        if (pointSystem) {
        pointSystem.resetTimer();
        pointSystem.startTimer();
        }
    } else {
        // Add points to the database
        var pointsToAdd = pointSystem.getTotalPoints();

        // Go back to the dashboard, or leaderboard
        window.location.href = '/leaderboard';
    }
}