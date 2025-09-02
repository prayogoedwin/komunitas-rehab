@foreach ($data as $item)
    <div class="forum-card">
        <div class="d-flex align-items-start">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                alt="User" class="user-avatar me-3" />
            <div class="flex-grow-1">
                <h4 class="h5">
                    <a href="{{ route('detail-forum', $item->id) }}" style="text-decoration: none" class="forum-judul"
                        data-id="{{ $item->id }}">{{ $item->judul }}</a>
                </h4>
                <p class="text-muted">
                    {{ Str::limit($item->deskripsi, 300) }}
                </p>
                <div class="d-flex flex-wrap align-items-center mt-3">
                    <span class="forum-stats me-3"><i class="fas fa-user me-1"></i>
                        {{ $item->sender->name }}</span>
                    <span class="forum-stats me-3"><i
                            class="fas fa-clock me-1"></i>{{ $item->created_at->diffForHumans() }}</span>
                    <span class="forum-stats me-3"><i class="fas fa-comment me-1"></i>
                        {{ $item->comment_count }} balasan</span>
                    <span class="forum-stats me-3"><i class="fas fa-eye me-1"></i> {{ $item->viewers }}
                        dilihat</span>
                </div>
            </div>
        </div>
    </div>
@endforeach
