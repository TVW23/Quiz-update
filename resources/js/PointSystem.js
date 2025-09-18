/*
* Author: Hesselst
* Github: https://github.com/Hesselst
* Description: This class contains all the functions for the point system, which will be used in each quiz
*
*
*    o    |~~~|
*   /\_  _|   |
*   \__`[_    |
*   ][ \,/|___|
*/

class PointSystem {
    constructor() {
        this.elapsedTime = 0;
        this.currentPoints = 0;
        this.running = false;
        this.totalPoints = 0;
        this.MIN_POINTS = 500;
        this.MAX_POINTS = 1000;
        this.TIME_INCREMENT = 1; // Increment amount for the elapsedTime
        this.WAIT_TIME = 1000; // Wait time in miliseconds for the timer
        this.PENALTY_RATE = 10;
        this.DIVISOR = 3;
        this.MULTIPLIER = 10;
        this.START_TIME = 0;
    }

    async startTimer() {
        this.running = true;

        while (this.running) {
            // Increase the elapsed time
            this.elapsedTime += this.TIME_INCREMENT;

            // Wait for some time
            await new Promise(r => setTimeout(r, this.WAIT_TIME));
        }
    }

    stopTimer() {
        this.running = false;
    }

    resetTimer() {
        // Set the elapsed time to the start time
        this.elapsedTime = this.START_TIME;
    }

    getCurrentTime() {
        return this.elapsedTime;
    }

    calculateCurrentPoints() {
        // calculate the minus points
        var minusPoints = (this.elapsedTime * PENALTY_RATE / DIVISOR) * MULTIPLIER;

        // Check if the minus points are less than the minimum points, so that the user doesn't obtain less than the min points
        if (minusPoints <= this.MIN_POINTS) {
            minusPoints = this.MIN_POINTS;
        }

        // Reset current points
        this.currentPoints = 0;

        this.currentPoints = this.MAX_POINTS - minusPoints;
    }

    getCurrentPoints() {
        return this.currentPoints;
    }

    incrementPoints() {
        // Add current points to the total points
        this.totalPoints += this.currentPoints;
    }

    getTotalPoints() {
        return this.totalPoints;
    }
}