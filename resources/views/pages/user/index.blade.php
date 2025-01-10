@extends('layouts.app')

@section('title', 'Lista de usuários')

@section('content')
    <div class="shadow rounded">
        @include('layouts.alerts')
        <p class="h2 mt-2">Lista de usuários</p>
    </div>
    <div class="shadow rounded mt-3">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user) 
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('user.edit', $user->id)}}" > Editar </a>
                    <a class="btn btn-danger btn-delete" data-id="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Excluir</a>

                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-between">
            {{ $users->links('pagination::bootstrap-4') }}
          </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  Você tem certeza que deseja excluir este usuário?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <form id="deleteForm" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Excluir</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          const deleteModal = document.getElementById('deleteModal');
          const deleteForm = document.getElementById('deleteForm');

          deleteModal.addEventListener('show.bs.modal', function (event) {
              const button = event.relatedTarget;
              const userId = button.getAttribute('data-id');
              deleteForm.setAttribute('action', `/user/${userId}`);
          });
      });
    </script>
@endsection
