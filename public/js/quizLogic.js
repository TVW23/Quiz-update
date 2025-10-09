var pointSystem = new PointSystem();
var streaks = new Streaks();
var pointsTxt;
var totalPoints = 0;

document.addEventListener('DOMContentLoaded', () => {
    console.log("Loaded the document");
    pointsTxt = document.getElementById("points-text");
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
    // Find the parent question step container
    const parent = button.closest('.question-step');
    // Remove selection and highlight from all answer buttons in this question
    parent.querySelectorAll('.button-layout').forEach(b => {
        b.style.border = '';
        delete b.dataset.selected;
    });
    button.style.border = '3px solid black';
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

    current.querySelectorAll('.button-layout').forEach(b => {
        // Disable the button
        b.disabled = true;
        // Add a border based on correctness
        if (b.dataset.correct == "1") {
            b.style.border = "3px solid green";
        } else {
        // Remove all other borders
        b.style.border = "none";
        }
    });

    // Check if correct
    if (selectedBtn.dataset.correct == "1") {
        feedback.textContent = "Goed gedaan! Dit is het correcte antwoord.";
        feedback.style.color = "green";

        pointSystem.stopTimer();
        var elapsedTime = pointSystem.getCurrentTime();
        var points = pointSystem.getCalculatedCurrentPoints(elapsedTime);
        pointSystem.incrementPoints(points);

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

    updateVisibleStreak();

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

function saveQuizPoints(quizId, points) {
    console.log(`[saveQuizPoints] quizId: ${quizId} points: ${points}`);

    return fetch('/user-quiz-points', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            quiz_id: quizId,
            points: points
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error. status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log("Response:", data);
        return data;
    })
    .catch(error => {
        console.error("Error:", error);
        throw error;
    });
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

        // Update streak after going to new question
        updateVisibleStreak();

        // Start timer for next question
        if (pointSystem) {
        pointSystem.resetTimer();
        pointSystem.startTimer();
        }
    } else {
        console.log("else stmt");
        // Get the points obtained from the quiz
        var pointsToAdd = pointSystem.getTotalPoints();

        let currentLocation = window.location; 
        
        // Get the current path name, so we can get the quiz
        let pathName = currentLocation.pathname;

        // Strip everything until the last slash, and also parse it into an int
        var quizId = parseInt(/[^/]*$/.exec(pathName)[0]);

        saveQuizPoints(quizId, pointsToAdd)
            .then((response) => {
                console.log("[saveQuizPoints] Points saved, now redirecting");
                console.log("Server response:", response);
                
                window.location.href = '/leaderboard';
            })
            .catch(err => {
                console.error("[saveQuizPoints] error:", err);
            });

    }
}

function updateVisibleStreak() {
    // Get the question step thats visible
    const visible = document.querySelector('.question-step:not(.hidden)');

    if (!visible) {
        console.log('question step not found');
        return;
    }
    // Get the streak text spna under the question step
    const streakSpan = visible.querySelector('.streaks-text');
    if (!streakSpan) {
        console.log('streaks text not found');
        return;
    }
    // Set the text of the span to the cur string (also turn it into a string)
    streakSpan.innerHTML = String(streaks.getCurStreak());
}
