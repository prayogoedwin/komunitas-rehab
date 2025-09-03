@extends('publik.app')
@section('content')
    <!-- Forum Detail Content -->
    <div class="container forum-detail-container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Discussion Post -->
                <div class="discussion-card">
                    <div class="discussion-meta">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                            alt="Ahmad S." class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">{{ $forum->sender_name }}</div>
                            <div class="discussion-date"><i class="far fa-clock me-1"></i>
                                {{ $forum->created_at->diffForHumans() }}</div>
                        </div>
                    </div>

                    <h2>{{ $forum->judul }}</h2>

                    <div class="discussion-content">
                        {{ $forum->deskripsi }}
                    </div>

                    <div class="discussion-stats">
                        <div class="stat-item">
                            <i class="far fa-eye"></i> {{ $forum->viewers }} dilihat
                        </div>
                        <div class="stat-item">
                            <i class="far fa-comment"></i> {{ $forum->comment()->count() }} komentar
                        </div>
                        <div class="stat-item">
                            <i class="far fa-thumbs-up"></i> {{ $forum->likes()->count() }} suka
                        </div>
                    </div>

                    @php
                        $isLiked = $forum
                            ->likes()
                            ->where('user_id', Auth::guard('member')->id())
                            ->exists();
                    @endphp
                    <div class="action-buttons">
                        <button class="btn-like {{ $isLiked ? 'btn-suka' : '' }}" data-id="{{ $forum->id }}">
                            <i class="far fa-thumbs-up"></i> <span class="like-count">{{ $forum->likes()->count() }}</span>
                        </button>
                        {{-- <button class="btn-comment">
                            <i class="far fa-comment"></i> Komentar
                        </button> --}}
                        <button class="btn-share" id="btnShare">
                            <i class="fas fa-share"></i> Bagikan
                        </button>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="comments-section">
                    <div class="comments-header">
                        <h3>{{ $forum->comment()->count() }} Komentar</h3>
                        {{-- <div class="sort-comments">
                            <select class="form-select form-select-sm" style="width: auto;">
                                <option>Terbaru</option>
                                <option>Terlama</option>
                                <option>Populer</option>
                            </select>
                        </div> --}}
                    </div>

                    <!-- Comment 1 -->
                    @foreach ($comment as $item)
                        <div class="comment-card">
                            <div class="comment-meta">
                                <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="Dr. Maya W." class="comment-user-avatar">
                                <div class="comment-user-info">
                                    <div class="comment-user-name">
                                        @php
                                            if ($item->is_admin_comment == 1) {
                                                $user = App\Models\User::where('id', $item->user_id)->first();
                                                $name = $user->name;
                                                $label = true;
                                            } else {
                                                $name = $item->user->name;
                                                $label = false;
                                            }
                                        @endphp
                                        {{ ucwords($name) }}
                                        </span>
                                    </div>
                                    <div class="comment-date"><i class="far fa-clock me-1"></i>
                                        {{ $item->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>

                            <div class="comment-content">
                                {{ $item->comment }}
                            </div>

                            <div class="comment-actions">
                                {{-- <button class="comment-action-btn">
                                    <i class="far fa-thumbs-up"></i> 8
                                </button> --}}
                                {{-- <button class="comment-action-btn">
                                <i class="far fa-comment"></i> Balas
                            </button> --}}
                            </div>
                        </div>
                    @endforeach

                    <div class="add-comment-form">
                        <h4 class="form-title">Tambahkan Komentar</h4>
                        <form action="{{ route('member.comment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_forum" value="{{ $forum->id }}">
                            <div class="mb-3">
                                <textarea required class="form-control" name="comment" rows="4" placeholder="Tulis komentar Anda di sini..."></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i> Komentar akan dipublikasikan setelah disetujui
                                    moderator
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-4">
                <!-- Related Discussions -->
                <div class="related-discussions">
                    <h4 class="related-header">Diskusi Terkait</h4>

                    <div class="related-card">
                        <h5 class="related-title">Rekomendasi kursi ergonomis untuk work from home</h5>
                        <div class="related-meta">
                            <span><i class="far fa-comment"></i> 23 balasan</span>
                            <span><i class="far fa-eye"></i> 156 dilihat</span>
                        </div>
                    </div>

                    <div class="related-card">
                        <h5 class="related-title">Peregangan sederhana untuk yang sering duduk lama</h5>
                        <div class="related-meta">
                            <span><i class="far fa-comment"></i> 18 balasan</span>
                            <span><i class="far fa-eye"></i> 210 dilihat</span>
                        </div>
                    </div>

                    <div class="related-card">
                        <h5 class="related-title">Pengalaman menggunakan standing desk</h5>
                        <div class="related-meta">
                            <span><i class="far fa-comment"></i> 14 balasan</span>
                            <span><i class="far fa-eye"></i> 189 dilihat</span>
                        </div>
                    </div>

                    <div class="related-card">
                        <h5 class="related-title">Apakah yoga membantu mengurangi nyeri punggung?</h5>
                        <div class="related-meta">
                            <span><i class="far fa-comment"></i> 27 balasan</span>
                            <span><i class="far fa-eye"></i> 245 dilihat</span>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="forum.html" class="btn btn-outline-primary">Lihat Semua Diskusi</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.getElementById("btnShare").addEventListener("click", function() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                alert("URL berhasil disalin: " + url);
            }).catch(err => {
                console.error("Gagal menyalin: ", err);
            });
        });
        $(document).on('click', '.btn-like', function() {
            let forumId = $(this).data('id');
            let btn = $(this);

            $.ajax({
                url: "{{ url('/forum') }}/" + forumId + "/like",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    forum_id: forumId
                },
                success: function(res) {
                    // update angka like
                    btn.find('.like-count').text(res.count);
                    if (res.status === 'liked') {
                        btn.addClass('btn-suka');
                    } else {
                        btn.removeClass('btn-suka');
                    }
                }
            });
        });
    </script>
@endpush
