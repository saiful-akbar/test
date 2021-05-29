<div class="container">
    <div class="section-title">
        <h2>Skills</h2>
    </div>

    <div class="row skills-content">
        <div class="col-lg-6" data-aos="fade-up">
            @foreach ($skills as $skill)
                @if ($loop->iteration <= ceil($skill->count() / 2))
                    <div class="progress">
                        <span class="skill">{{ $skill->skill_name }}</span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            @foreach ($skills as $skill)
                @if ($loop->iteration > ceil($skill->count() / 2))
                    <div class="progress">
                        <span class="skill">{{ $skill->skill_name }}</span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
