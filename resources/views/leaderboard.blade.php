<x-app-layout>
<div class="leaderboard-wrapper">
  <div class="podium-row">
    <!-- 2nd Place -->
    @if (isset($userQuizPoints[1]))
    <div class="podium-place second">
      <img
        width="60"
        height="60"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="2nd place"
      />
      <div class="podium-base gray">
        <div class="podium-card">
          <p class="name">{{ $userQuizPoints[1]->user->name }}</p>
          <p class="points">{{ $userQuizPoints[1]->points }} pts</p>
        </div>
      </div>
    </div>
    @endif

    <!-- 1st Place -->
    @if (isset($userQuizPoints[0]))
    <div class="podium-place first">
      <img
        width="70"
        height="70"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="1st place"
      />
      <div class="podium-base yellow">
        <div class="podium-card">
          <p class="name">{{ $userQuizPoints[0]->user->name }}</p>
          <p class="points">{{ $userQuizPoints[0]->points }} pts</p>
        </div>
      </div>
    </div>
    @endif

    <!-- 3rd Place -->
    @if (isset($userQuizPoints[2]))
    <div class="podium-place third">
      <img
        width="55"
        height="55"
        src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg"
        alt="3rd place"
      />
      <div class="podium-base bronze">
        <div class="podium-card">
          <p class="name">{{ $userQuizPoints[2]->user->name }}</p>
          <p class="points">{{ $userQuizPoints[2]->points }} pts</p>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>



  <div class="mx-auto mt-5 max-w-4xl p-20">
    @foreach($userQuizPoints as $index => $quizPoint)
    <div class="flex items-center justify-between rounded-lg CB-roze LB-cards-border px-5 py-5 font-bold text-white mb-6">
      <div class="flex items-center space-x-5">
        <p>{{ $index+1 }}</p>
        <img class="rounded-full" width="50" height="50" src="https://static.vecteezy.com/system/resources/previews/004/511/281/original/default-avatar-photo-placeholder-profile-picture-vector.jpg" alt="" />
        <p>{{ $quizPoint->user->name }}</p>
      </div>
      <p class="text-lg">{{ $quizPoint->points }}</p>
    </div>
    @endforeach
  </div>
</x-app-layout>

<style>
 .pt-15 {
  padding-top: 4rem;
 }

 .CB-roze {
  background-color: #E72B76;
 }

 .LB-cards-border {
  border: 2px solid #a82157;
 }

  body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #f3f4f6; /* bg-gray-100 */
}

/* Main Wrapper */
.leaderboard-wrapper {
  width: 100%;
  margin: 0 auto;
  padding-top: 3.75rem; /* pt-15 ~ 60px */
}

/* Podium Row */
.podium-row {
  display: flex;
  justify-content: center;
  align-items: flex-end;
  gap: 1rem; /* space-x-4 */
}

/* Podium Places */
.podium-place {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.podium-place img {
  border-radius: 50%;
  margin-bottom: 0.5rem;
  border: 4px solid #d1d5db; /* border-gray-300 */
}

.podium-place.first img {
  border-color: #facc15; /* border-yellow-400 */
}

.podium-place.third img {
  border-color: #92400e; /* border-amber-700 */
}

/* Podium Base Colors */
.podium-base {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  width: 100%;
  padding: 1.25rem; /* p-5 ~ 20px */
}

.podium-base.gray {
  background-color: #374151; /* bg-gray-700 */
}

.podium-base.yellow {
  background-color: #eab308; /* bg-yellow-500 */
}

.podium-base.bronze {
  background-color: #92400e; /* bg-amber-700 */
}

/* Inner Card */
.podium-card {
  background-color: white;
  color: #374151; /* text-gray-700 */
  text-align: center;
  padding: 0.5rem 1.25rem;
  margin-bottom: 2.5rem; /* mb-10 / mb-20 */
  border-radius: 6px;
}

.podium-card .name {
  font-size: 1.25rem; /* text-xl */
  font-weight: 700;
}

.podium-card .points {
  font-size: 1rem;
}

/* Leaderboard List */
.leaderboard-list {
  max-width: 56rem; /* max-w-4xl */
  margin: 1.25rem auto 0; /* mt-5 */
  padding: 5rem; /* p-20 ~ 80px */
}

.leaderboard-card {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #c084fc; /* placeholder CB-roze */
  border: 2px solid #d1d5db; /* placeholder LB-cards-border */
  border-radius: 0.5rem;
  padding: 1.25rem; /* px-5 py-5 */
  margin-bottom: 1.5rem; /* mb-6 */
  font-weight: bold;
  color: white;
}

.card-left {
  display: flex;
  align-items: center;
  gap: 1.25rem; /* space-x-5 */
}

.card-left img {
  border-radius: 50%;
}

.card-points {
  font-size: 1.125rem; /* text-lg */
}

</style>