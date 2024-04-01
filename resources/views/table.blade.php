<div xmlns:x-moonshine="http://www.w3.org/1999/html" x-data="data()">
    <x-moonshine::box>
        <x-moonshine::table>
            <x-slot:thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('moonshine-scheduling::scheduling.task') }}</th>
                    <th>{{ __('moonshine-scheduling::scheduling.run_at') }}</th>
                    <th>{{ __('moonshine-scheduling::scheduling.next_run_time') }}</th>
                    <th>{{ __('moonshine-scheduling::scheduling.description') }}</th>
                    <th>{{ __('moonshine-scheduling::scheduling.run') }}</th>
                </tr>
            </x-slot:thead>
            <x-slot:tbody>
                @foreach($events as $index => $event)
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td><code>{{ $event['task']['name'] }}</code></td>
                        <td>
                            <x-moonshine::badge
                                    color="success">{{ $event['expression'] }}</x-moonshine::badge>&nbsp;{{ $event['readable'] }}
                        </td>
                        <td>{{ $event['nextRunDate'] }}</td>
                        <td>{{ $event['description'] }}</td>
                        <td>
                            <x-moonshine::link-button x-on:click="runEvent({{ $index + 1 }})">
                                {{ __('moonshine-scheduling::scheduling.run_action') }}
                            </x-moonshine::link-button>
                        </td>
                    </tr>
                @endforeach
            </x-slot:tbody>
        </x-moonshine::table>
    </x-moonshine::box>
    <x-moonshine::divider xmlns:x-moonshine="http://www.w3.org/1999/html"/>
    <x-moonshine::box xmlns:x-moonshine="http://www.w3.org/1999/html"
                      title="{{ __('moonshine-scheduling::scheduling.output') }}"
                      x-show="output">
        <pre style="white-space:pre-wrap;background: #000000;color: #00fa4a;padding: 10px;border-radius: 0;" x-text="output"></pre>
    </x-moonshine::box>
</div>

<script>
    function data() {
        return {
            output: '',
            showMessage: false,
            message: '',
            runEvent(id) {
                fetch(`{{ route('moonshine.scheduling.run') }}`, {
                    method: "post",
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({id})
                })
                    .then(res => res.json())
                    .then(data => {
                        this.output = data.status ? data.data : '';
                        this.$dispatch('toast', {type: data.status ? 'success' : 'error', text: data.message});
                    })
                    .catch(() => {
                        this.$dispatch('toast', {type: 'error', text: {{ __('moonshine-scheduling::scheduling.failed') }}});
                    });
            }
        }
    }

</script>
