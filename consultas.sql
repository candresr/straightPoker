

select e.nombre as equipo, j.nombre as jugador, j.fecha_nacimiento 
from equipos e, jugadores j
where j.fecha_nacimiento = 
(select MIN(j.fecha_nacimiento) from jugadores j where j.fk_equipos = e.id_equipos);


select e.nombre, count(p.fk_equipo_visitante) as partidos
from equipos e
left join partidos p on p.fk_equipo_visitante = e.id_equipos
group by e.nombre
order by partidos desc;

select e.nombre as equipo, count(p.id_partidos) as partidos from equipos e
inner join partidos p on e.id_equipos = p.fk_equipo_local or e.id_equipos = p.fk_equipo_visitante 
where p.fecha_partido between '2016-01-01' and '2016-02-12'
group by e.nombre;

select a.nombre_equipo,
case
 when a.goles_local is null then 0
 else a.goles_local
 end as goles_local,
 case
 when b.goles_visitante is null then 0
 else b.goles_visitante
 end as goles_visitante
from
(select e.nombre as nombre_equipo, sum(p.goles_local) as goles_local
from equipos e left join partidos p on p.fk_equipo_local = e.id_equipos group by e.nombre) as a,
(select e.nombre as nombre_equipo, sum(p.goles_visitante) as goles_visitante
 from equipos e left join partidos p on p.fk_equipo_visitante = e.id_equipos group by e.nombre) as b
 where a.nombre_equipo = b.nombre_equipo group by a.nombre_equipo;


select a.nombre_equipo, goles_local, goles_visitante, (goles_local+goles_visitante) as total
from
(select e.nombre as nombre_equipo, sum(p.goles_local) as goles_local
from equipos e left join partidos p on p.fk_equipo_local = e.id_equipos where e.nombre = 'Chacarita') as a,
(select e.nombre as nombre_equipo, sum(p.goles_visitante) as goles_visitante
 from equipos e left join partidos p on p.fk_equipo_visitante = e.id_equipos where e.nombre = 'Chacarita') as b

