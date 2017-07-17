@extends('main')

@section('title', '| View Post')

@section('content')
		<div class="row">
			<div class="col-md-8">

				<h1><strong>หัวข้อ :</strong> {{ $post->title }}</h1>

				<hr>

				<p class="lead">{!! $post->body !!}</p>

				<hr>

				<div class="tags">
					@foreach ($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
					@endforeach
				</div>
				<div class="well well-sm" style="margin-top:50px;">

				<div id="backend-comments" >
						<h3>ความคิดเห็น <span class="badge">{{ $post->comments()->count() }} ข้อความ</span></h3>
						<table class="table">
							<thead>
								<tr>
									<th>ชื่อ</th>
									<th>ความคิดเห็น</th>
									<th width="40px"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($post->comments as $comment)
									<tr>
										<td>{{ $comment->author->name }}</td>
										<td>{{ $comment->comment }}</td>
										<td>


												{!! Html::linkRoute('comments.edit', 'แก้ไข', array($comment->id), array('class' => 'btn btn-primary btn-block')) !!}

												{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

												{!! Form::submit('ลบ', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return window.confirm("คุณต้องการลบความคิดเห็นนี้ ใช่หรือไหม?");' ]) !!}

												{!! Form::close() !!}


										</td>
									</tr>
									@endforeach
							</tbody>
						</table>
				</div>

			</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="dl-horizontal">
						<label>Url:</label>
						<p><a href="{{ route('blog.single', $post->slug) }}" target="_blank" >
							{{ substr(route('blog.single', $post->slug), 0, 40) }}{{ strlen(route('blog.single', $post->slug)) > 60 ? "..." :"" }}
							</a></p>
					</dl>

					<dl class="dl-horizontal">
						<label>หมวดหมู่ :</label>
						<p>{{ $post->category->name }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>โพสเมื่อวันที่ :</label>
						<p>{{ date('D, d M Y h:ia', strtotime($post->created_at)) }}</p>
					</dl>

					<dl class="dl-horizontal">
						<label>ปรับปรุงเมื่อวันที่ :</label>
						<p>{{ date('D, d M Y h:ia', strtotime($post->updated_at)) }}</p>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.edit', 'แก้ไข', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

							{!! Form::submit('ลบข้อมูล', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return window.confirm("คุณต้องการลบข้อมุลนี้ ใช่หรือไหม?");']) !!}

							{!! Form::close() !!}
						</div>

					</div>
					<div class="row">
						<div class="col-md-12">
							{{ Html::linkRoute('posts.index', '<< ดูข้อมูลทั้งหมด', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}

						</div>
					</div>

				</div>
			</div>
		</div>


	<!-- Edit Modal start -->
	<div class="modal fade" id="editModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<form action="{{ url('comments/edit') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<div class="form-group">
								<label for="edit_name">ชื่อ : </label>
								<input type="text" class="form-control" id="edit_name" name="edit_name">
							</div>
							<div class="form-group">
								<label for="edit_last_name">ความคิดเห็น</label>
								<input type="text" class="form-control" id="edit_comment" name="edit_comment">
							</div>
						</div>

						<button type="submit" class="btn btn-default">Update</button>
						<input type="hidden" id="edit_id" name="edit_id">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>

			</div>

		</div>
	</div>
	<!-- Edit code ends -->

@endsection

@section('javascript')

	<script>

</script>
@endsection
