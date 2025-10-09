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
            this.elapsedTime += PointSystem.CONFIG.TIME_INCREMENT;

            // Wait for some time
            await new Promise(r => setTimeout(r, PointSystem.CONFIG.WAIT_TIME));
        }
    }

    stopTimer() {
        this.running = false;
    }

    resetTimer() {
        // Set the elapsed time to the start time
        this.elapsedTime = PointSystem.CONFIG.START_TIME;
    }

    getCurrentTime() {
        return Number(this.elapsedTime);
    }

    getCalculatedCurrentPoints(time) {
        console.log("Time: " + time);

        // If user has answered within 1 second, give 1000 points 
        if (time <= 1) {
            this.currentPoints = 1000;
            return this.currentPoints;
        }

        // calculate the minus points
        var minusPoints = (time * PointSystem.CONFIG.PENALTY_RATE / PointSystem.CONFIG.DIVISOR) * PointSystem.CONFIG.MULTIPLIER;

        console.log("Minus points: " + minusPoints);
        // Check if the minus points are less than the minimum points, so that the user doesn't obtain less than the min points
        if (minusPoints >= PointSystem.CONFIG.MIN_POINTS) {
            minusPoints = PointSystem.CONFIG.MIN_POINTS;
        }

        // Reset current points
        this.currentPoints = 0;

        this.currentPoints = PointSystem.CONFIG.MAX_POINTS - minusPoints;

        // Round the number up to wholes
        this.currentPoints = Math.round(this.currentPoints);

        return this.currentPoints;
    }

    getCurrentPoints() {
        return Number(this.currentPoints);
    }

    incrementPoints(pointsToAdd) {
        // Add current points to the total points
        this.totalPoints += pointsToAdd;
    }

    getTotalPoints() {
        return Number(this.totalPoints);
    }

    resetTotalPoints() {
        this.totalPoints = 0;
    }
}