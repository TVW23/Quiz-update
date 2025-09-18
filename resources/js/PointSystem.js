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

    // Config for magic numbers
    static CONFIG = {
    MIN_POINTS: 500,
    MAX_POINTS: 1000,
    TIME_INCREMENT: 1,
    WAIT_TIME: 1000,
    PENALTY_RATE: 10,
    DIVISOR: 3,
    MULTIPLIER: 10,
    START_TIME: 0,
    };

    constructor() {
    this.elapsedTime = 0;
    this.currentPoints = 0;
    this.running = false;
    this.totalPoints = 0;
    }

    async startTimer() {
        this.running = true;

        while (this.running) {
            // Increase the elapsed time
            this.elapsedTime += this.CONFIG.TIME_INCREMENT;

            // Wait for some time
            await new Promise(r => setTimeout(r, this.CONFIG.WAIT_TIME));
        }
    }

    stopTimer() {
        this.running = false;
    }

    resetTimer() {
        // Set the elapsed time to the start time
        this.elapsedTime = this.CONFIG.START_TIME;
    }

    getCurrentTime() {
        return Number(this.elapsedTime);
    }

    calculateCurrentPoints() {
        // calculate the minus points
        var minusPoints = (this.elapsedTime * this.CONFIG.PENALTY_RATE / this.CONFIG.DIVISOR) * this.CONFIG.MULTIPLIER;

        // Check if the minus points are less than the minimum points, so that the user doesn't obtain less than the min points
        if (minusPoints <= this.CONFIG.MIN_POINTS) {
            minusPoints = this.CONFIG.MIN_POINTS;
        }

        // Reset current points
        this.currentPoints = 0;

        this.currentPoints = this.CONFIG.MAX_POINTS - minusPoints;
    }

    getCurrentPoints() {
        return Number(this.currentPoints);
    }

    incrementPoints() {
        // Add current points to the total points
        this.totalPoints += this.currentPoints;
    }

    getTotalPoints() {
        return Number(this.totalPoints);
    }
}