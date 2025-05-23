// Task07_1/vector.test.js
import { createVector } from './vector.js';

describe('Векторные операции', () => {
  const v1 = createVector(1, 2, 3);
  const v2 = createVector(4, 5, 6);

  test('getLength вычисляет длину вектора', () => {
    expect(v1.getLength()).toBeCloseTo(Math.sqrt(14), 5);
  });

  test('add складывает два вектора', () => {
    const result = v1.add(v2);
    expect({ x: result.x, y: result.y, z: result.z }).toEqual({ x: 5, y: 7, z: 9 });
  });

  test('sub вычитает один вектор из другого', () => {
    const result = v1.sub(v2);
    expect({ x: result.x, y: result.y, z: result.z }).toEqual({ x: -3, y: -3, z: -3 });
  });

  test('product умножает вектор на скаляр', () => {
    const result = v1.product(2);
    expect({ x: result.x, y: result.y, z: result.z }).toEqual({ x: 2, y: 4, z: 6 });
  });

  test('scalarProduct вычисляет скалярное произведение', () => {
    const result = v1.scalarProduct(v2);
    expect(result).toBe(32); // 1*4 + 2*5 + 3*6 = 4 + 10 + 18 = 32
  });

  test('vectorProduct вычисляет векторное произведение', () => {
    const result = v1.vectorProduct(v2);
    expect({ x: result.x, y: result.y, z: result.z }).toEqual({ x: -3, y: 6, z: -3 });
  });

  test('toString возвращает строковое представление', () => {
    expect(v1.toString()).toBe('(1;2;3)');
  });
});