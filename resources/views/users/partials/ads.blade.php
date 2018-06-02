@unless($user->ads->isEmpty())

<h2>My Ads</h2>

<table class="table table-hover">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user->ads as $ad)
      <tr class="{{ $ad->approve ? 'success' : 'danger' }}">
        <td>{{ Html::link(route('ads.show', $ad->slug), $ad->title) }}</td>
        <td>{!! str_limit($ad->description, 100) !!}</td>
        <td>
          {{ Html::link(route('ads.edit', $ad->id), 'Edit') }} | {{ Html::link(route('ads.delete', $ad->id), 'Delete') }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@else
<p>You have not posted any ads yet.</p>
@endunless