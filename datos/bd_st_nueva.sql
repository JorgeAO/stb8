USE 'bd_st_nueva';




DROP TABLE IF EXISTS 'bd_st_nueva'.'tb_caj_movimientos';
CREATE TABLE IF NOT EXISTS 'bd_st_nueva'.'tb_caj_movimientos' (
  'movi_codigo' int(11) NOT NULL AUTO_INCREMENT,
  'fk_par_inversionistas' int(11) NOT NULL,
  'movi_tipo' varchar(1) NOT NULL,
  'movi_descripcion' varchar(100) NOT NULL,
  'movi_fecha' datetime NOT NULL,
  'movi_monto' decimal(10,0) NOT NULL,
  'fc' datetime NOT NULL,
  'uc' int(11) NOT NULL,
  PRIMARY KEY ('movi_codigo')
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;