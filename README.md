Queremos diseñar un blog que de momento solo permitirá publicar/guardar posts, con las siguientes características:

Cada Post tendrá un título y un cuerpo. El título no puede superar los 50 caracteres y el cuerpo no puede superar los 2000 caracteres.
Para crear el Post existen dos opciones:
solo guardarlo y no publicarlo en el blog
guardarlo y publicarlo en el blog. Si el Post ya existe no se volverá a guardar ni se publicará.
Para publicar el Post se publicará un evento en una cola de mensajes.
Cada Post lo publicará un usuario, que deberá tener las siguientes características:
Cada usuario tendrá un Email y un Password.
El Email debe ser válido.
El Password no debe superar los 28 caracteres y no debe ser de menos de 3 caracteres; debe contener como mínimo un número y una letra.
 Implementa los diferentes componentes del blog y realiza los tests unitarios y de integración pertinentes para cada uno de ellos. Haz uso de los dataProviders para testear el componente de Email y Password.

Componentes mínimos a implementar (el nombre puede variar):

Email
Password
User
PostRepository
CreatePostUseCase
EventQueue
PostCreatedEvent
El nombre del proyecto será [NombreApellido]-mpweb[año]-de-blog. NombreApellido corresponde al nombre y apellido del alumno y año corresponde al periodo que se cursa el Máster, por ejemplo, al Máster cursado la última mitad del año 2016 y la primera mitad del año 2017 le corresponde año=2016_17.

A entregar:

URL del repositorio del Blog.

El nombre del fichero txt a entregar debe ser el mismo que el nombre del repositorio.