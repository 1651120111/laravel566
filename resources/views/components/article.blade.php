@if(isset($articles))
    @foreach($articles as $article)
        <div class="article" style="display: flex;margin-bottom: 30px;border-bottom: 1px solid #dedede;padding:  15px  10px">
            <div class="article_avatar" >
                <a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}" >
                    <img src="{{pare_url_file($article->a_avatar)}}" style="width: 200px;height: 150px" alt="">
                </a>
            </div>
            <div class="article_info" style="width: 70%;margin-left: 30px">

                <a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}"><h2 style="font-size: 15px">{{$article->a_name}}</h2></a>
                <p style="font-size: 14px">{{$article->a_description}}</p>
                <p style="font-size: 13px">Thien nhan <span>{{$article->created_at}}</span></p>
            </div>
        </div>

    @endforeach
    {!! $articles->links() !!}
@endif
