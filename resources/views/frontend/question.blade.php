@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('hoi-dap')}}" title="Hỏi đáp">Hỏi đáp</a></h3>
                    </div>
                    <div class="contact-content">

                        @include('frontend.form_get_phone', ['is_full' => false])

                        <div class="box-faq">
                            @foreach ($questions as $question)
                                <article class="item">
                                <h3 class="title-faq">
                                    <img src="{{url('img/cache/58x58', $question->image)}}" alt="" width="58" height="58" class="faq-icon">
                                    <div class="title-ques">
                                        <strong class="text">{{$question->title}}</strong> <br>
                                        <i class="normal">Hỏi bởi: {{$question->person}}</i>
                                    </div>
                                </h3>
                                <div class="content">
                                    <p>
                                      <span>
                                      {{$question->question}}
                                      </span>
                                    </p>
                                    <div class="viewDetail clearFix">
                                        <div class="date">
                                            <span class="datePost">
                                              {{$question->created_at->format('Y/m/d')}}
                                            </span>
                                            <span>
                                             {{$question->created_at->format('H:i:s')}}
                                            </span>
                                        </div>
                                        <span class="answer">Trả lời</span>
                                        <div class="answer-faq">
                                            <img src="{{url('img/cache/58x58', $question->image)}}" alt="" width="58" height="58" class="faq-icon">
                                            <div class="text">
                                                {{$question->short_answer}}
                                            </div>
                                            <a href="{{url('hoi-dap', $question->slug)}}" class="viewMore">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                            @include('frontend.pagination', ['paginate' => $questions])
                        </div>
                    </div>
                    @include('frontend.list_button')
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection