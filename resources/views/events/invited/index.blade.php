<x-app-layout>
    <div class="grid place-items-center">
        <div class="space-y-8 text-center">
            <h1 class="uppercase font-bold">Meus Convidados</h1>
            <div id="menu" class="flex flex-wrap gap-2">
                <x-primary-button class="w-full sm:w-fit justify-center">novo</x-primary-button>
                <x-primary-button class="w-full sm:w-fit justify-center">link compartilhável</x-primary-button>
            </div>
        </div>
        <div id="add-new-invited" class="sm:h-52 grid gap-4 place-items-center mt-14 p-4 border rounded-lg bg-color-30 shadow-md">
            <form action="" method="post" class="flex flex-wrap gap-2 justify-center">
                @csrf
                <div>
                    <x-input-label for="name" value="Nome" />
                    <x-text-input id="name" />
                </div>
                <div>
                    <x-input-label for="phone" value="Telefone" />
                    <x-text-input id="phone" />
                </div>
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" />
                </div>
            </form>
            
            <div class="flex flex-wrap gap-2">
                <x-primary-button>Salvar</x-primary-button>
                <x-primary-button>Cancelar</x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>